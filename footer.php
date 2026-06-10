<footer>
  <div class="latin">© Good life salon HARE</div>
</footer>

<script>
const io=new IntersectionObserver((es)=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
</script>
<?php wp_footer(); ?>
</body>
</html>
