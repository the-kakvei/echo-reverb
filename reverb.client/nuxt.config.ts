// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: '2024-11-01',
    devtools: { enabled: true },
    modules: ['nuxt-laravel-echo'],

    echo: {
        broadcaster: 'reverb', // available: reverb, pusher
        host: 'reverb.server.test',
        port: 8080,
        scheme: 'http', // available: http, https
        transports: ['ws', 'wss'],
        key: '8b6oydjo9dcnce0vojet', // Your Laravel Echo app key
    },
})
