  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-2024</strong> All rights reserved.
  </footer>
</div>

<script>
  var countdown = {{ Session::get('countdown', 20) }};
  var redirectUrl = '{{ Session::get('redirect_url', route('dashboard')) }}';

  function updateCountdown() {
      countdown--;
      document.getElementById('countdown').innerText = countdown;

      if (countdown <= 0) {
          window.location.href = redirectUrl;
      } else {
          setTimeout(updateCountdown, 1000);
      }
  }

  updateCountdown();
</script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>