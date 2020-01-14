<footer class="footer fixed-bottom">
  <?php if (!is_logged_in() & $p !=='login' & $p !== 'register') : //display when the user isn't logged ?>
  <ul class="list-group list-group-horizontal">
    <li class="list-group-item">
      <a class="btn btn-primary" href="index.php?p=login" role="button">Connexion</a>
    </li>
    <li class="list-group-item">
      <a class="btn btn-primary" href="index.php?p=register">Inscription</a>
    </li>
  </ul>
  <?php else : //nothing to display?>
  <?php endif; ?>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>