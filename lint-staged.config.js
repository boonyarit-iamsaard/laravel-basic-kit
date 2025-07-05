export default {
    '**/*': 'prettier --check --ignore-unknown',
    '**/*.{js,cjs,mjs}': ['eslint'],
    '**/*.php,!**/*.blade.php': [
        './vendor/bin/pint --test',
        'vendor/bin/rector --dry-run',
        './vendor/bin/phpstan analyse',
    ],
};
