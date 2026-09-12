#!/usr/bin/env bash

set -euo pipefail

IMAGE_NAME="${DOCKERHUB_USERNAME:?Définissez DOCKERHUB_USERNAME avant de lancer le script}/reservation-salles"
START_TAG="${1:-v0.0.0}"
DRY_RUN="${DRY_RUN:-0}"
ORIGINAL_REF="$(git symbolic-ref --quiet --short HEAD || git rev-parse HEAD)"
BUILD_FILE="$(mktemp)"

cleanup() {
        rm -f "$BUILD_FILE"
        git checkout --quiet "$ORIGINAL_REF"
}

if [[ -n "$(git status --porcelain)" ]]; then
        echo "Le dépôt doit être propre avant de parcourir les tags Git." >&2
        exit 1
fi

mapfile -t VERSION_TAGS < <(
        git tag \
        | awk '$0 ~ /^[vV][0-9]+\.[0-9]+\.[0-9]+$/' \
        | awk '{ print substr($0, 2), $0 }' \
        | sort -k1,1V \
        | awk '{ print $2 }' \
        | awk -v start_tag="$START_TAG" '
                $0 == start_tag { started = 1 }
                started { print }
        '
)

if [[ "${#VERSION_TAGS[@]}" -eq 0 ]]; then
        echo "Aucun tag de version trouvé à partir de ${START_TAG}." >&2
        exit 1
fi

cp docker/Dockerfile "$BUILD_FILE"
trap cleanup EXIT

for VERSION_TAG in "${VERSION_TAGS[@]}"; do
        echo "Construction et publication de ${IMAGE_NAME}:${VERSION_TAG}"
        git checkout --quiet "$VERSION_TAG"
        if [[ "$DRY_RUN" == "1" ]]; then
                continue
        fi
        docker build -f "$BUILD_FILE" -t "${IMAGE_NAME}:${VERSION_TAG}" .
        docker push "${IMAGE_NAME}:${VERSION_TAG}"
done

echo "Toutes les versions ont été publiées sur Docker Hub."