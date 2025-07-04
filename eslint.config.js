import js from "@eslint/js";
import globals from "globals";
import { defineConfig } from "eslint/config";

export default defineConfig([
    {
        files: ["**/*.{js,mjs,cjs}"],
        plugins: { js },
        extends: ["js/recommended"],
        ignores: [
            "vendor/**",
            "node_modules/**",
            "public/**",
            "storage/**",
            "bootstrap/**",
            "resources/views/**",
        ],
        languageOptions: { globals: { ...globals.browser, ...globals.node } },
    },
]);
