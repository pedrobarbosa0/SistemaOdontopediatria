import { createAvatar } from '@dicebear/core';
import { lorelei } from '@dicebear/collection';

// Função para gerar avatar
function generateAvatar() {
    const skinColor = document.getElementById('skin-color').value.substring(1); // Remove o '#'
    const eyeColor = document.getElementById('eye-color').value.substring(1); // Remove o '#'
    const hairColor = document.getElementById('hair-color').value.substring(1); // Remove o '#'

    const avatar = createAvatar(lorelei, {
        seed: 'custom-avatar',
        skinColor: [skinColor],
        eyesColor: [eyeColor],
        hairColor: [hairColor],
    });

    const svg = avatar.toString();
    document.getElementById('avatar-preview').innerHTML = svg;
    document.getElementById('avatar-data').value = JSON.stringify({ skinColor, eyeColor, hairColor });
}

// Adiciona evento ao botão
document.getElementById('generate-avatar').addEventListener('click', generateAvatar);