  import { defineConfig, normalizePath, build } from 'vite';
  import laravel from 'laravel-vite-plugin';
  import path, { resolve } from 'path'
  import { fileURLToPath } from 'url';
  import { viteStaticCopy } from 'vite-plugin-static-copy';


  const __filename = fileURLToPath(import.meta.url);
  const __dirname = path.dirname(__filename);
  
  export default defineConfig({        
        plugins: [                 
          laravel({
              input: ['resources/src/assets/scss/app.scss', 
                      'resources/src/assets/js/app.js',
                      'resources/src/assets/scss/iconly.scss',              
                      'resources/src/assets/static/js/initTheme.js',
                      'resources/dist/assets/static/js/pages/dashboard.js',
                      'resources/dist/assets/extensions/jquery/jquery.min.js',
                      'resources/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js',
                      'resources/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js',
                      'resources/dist/assets/static/js/pages/datatables.js',
                      'resources/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
                      'resources/src/assets/scss/pages/datatables.scss',
                      'resources/dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css',
                      'resources/dist/assets/extensions/choices.js/public/assets/scripts/choices.js',
                      'resources/dist/assets/static/js/pages/form-element-select.js',
                      'resources/dist/assets/extensions/choices.js/public/assets/styles/choices.css',
                      'resources/dist/assets/compiled/js/app.js',
                      'resources/dist/assets/compiled/css/table-datatable-jquery.css',
                      'resources/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js',
                      'resources/css/app.css',
                      'resources/js/app.js',
                      ],
              refresh: true,
          }),
      ],
      resolve: {
          alias: {
            '@': normalizePath(resolve(__dirname, 'resources/src')),
            '~bootstrap':  resolve(__dirname, 'node_modules/bootstrap'),
            '~bootstrap-icons': resolve(__dirname, 'node_modules/bootstrap-icons'),
            '~perfect-scrollbar': resolve(__dirname, 'node_modules/perfect-scrollbar'),
            '~@fontsource': resolve(__dirname, 'node_modules/@fontsource'),
          },
      },
  });


//'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',