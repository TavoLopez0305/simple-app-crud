const gulp = require('gulp');
const path = require('path');

// Tarea para limpiar la carpeta 'light'
async function cleanWebp() {
  console.log('Ejecutando clean-webp...');
  try {
    const delModule = await import('del');
    await delModule.deleteAsync(['src/assets/img/light/**']);
    console.log('Carpetas eliminadas exitosamente.');
    return Promise.resolve();
  } catch (error) {
    console.error('Error al eliminar carpetas:', error);
    return Promise.reject(error);
  }
}

// Tarea optimizada para convertir imágenes a WebP
async function webpTask() {
  const webp = await import('gulp-webp');
  return gulp.src('src/assets/img/traditional/**/*.{jpg,jpeg,png}')
    .pipe(webp.default({
      quality: 80, // Ajusta la calidad según necesites
      preset: 'photo' // Mejor para fotografías
    }))
    .pipe(gulp.dest('src/assets/img/light')); // Ruta directa sin lógica adicional
}

// Tarea para verificar la estructura de archivos
function checkStructure(done) {
  const glob = require('glob');
  glob('src/assets/img/light/**/*.webp', (err, files) => {
    if (err) {
      console.error('Error al verificar estructura:', err);
      return done(err);
    }
    console.log('Archivos WebP generados:');
    files.forEach(file => console.log(`- ${file}`));
    done();
  });
}

// Define las tareas
gulp.task('clean-webp', cleanWebp);
gulp.task('webp', webpTask);
gulp.task('check-structure', checkStructure);

// Tarea por defecto mejorada
gulp.task('default', gulp.series(
  'clean-webp',
  'webp',
  'check-structure'
));