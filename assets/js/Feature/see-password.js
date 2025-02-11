document.querySelectorAll('.toggle-password').forEach(function (element) {
  element.addEventListener('click', function () {
    const target = document.getElementById(this.dataset.toggle);
    if (target.type === 'password') {
      target.type = 'text';
      this.classList.remove('fa-eye');
      this.classList.add('fa-eye-slash');
    } else {
      target.type = 'password';
      this.classList.remove('fa-eye-slash');
      this.classList.add('fa-eye');
    }
  });
});