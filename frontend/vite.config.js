import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import VueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    VueDevTools(),
    vue()
  ],
  server: {
    watch: {
      usePolling: true,
    },
    // Adding HMR explicitly binding to ports if needed, but usePolling alone usually fixes it.
    hmr: {
      clientPort: 5173
    }
  }
})
