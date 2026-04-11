import Swal from 'sweetalert2';
window.Swal = Swal;

const Swal2 = Swal.mixin({
  customClass: {
    input: 'form-control'
  }
})

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
//Para los demas tipos de alertas, se puede usar el Swal2 o el Toast dependiendo del tipo de alerta que quieras mostrar.
//Solamente copiar y pegar en base a la plantilla mazer

document.getElementById("success").addEventListener("click", (e) => {
  Swal2.fire({
    icon: "success",
    title: "Success",
  })
})
document.getElementById("error").addEventListener("click", (e) => {
  Swal2.fire({
    icon: "error",
    title: "Error",
  })
})
document.getElementById("warning").addEventListener("click", (e) => {
  Swal2.fire({
    icon: "warning",
    title: "Warning",
  })
})
document.getElementById("info").addEventListener("click", (e) => {
  Swal2.fire({
    icon: "info",
    title: "Info",
  })
})
document.getElementById("question").addEventListener("click", (e) => {
  Swal2.fire({
    icon: "question",
    title: "Question",
  })
})