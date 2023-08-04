const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  filenameHashing: false,
  publicPath: process.env.NODE_ENV === "production" ? "/chd102/g6/" : "/",
  css: {
    sourceMap: true
  },
  pages: {
    index: {
      // entry for the page
      entry: "src/main.js",
      // the source template
      template: "public/index.html",
      // output as dist/index.html
      filename: "index.html"
    }
  },
  devServer: {
    proxy: {
        "/api_server": {
          // 本地端測試用路徑
            target: "http://localhost/DAKA/public/phpfile",
            changeOrigin: true,
            pathRewrite: {
                "^/api_server": "",
            },
        },
    },
  },
})
