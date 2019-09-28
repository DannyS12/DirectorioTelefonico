<footer id="footer" class="footer">
     <p>&copy; 2019 SoftByte-Soluciones Informáticas</p>
</footer>
<script src="<?=base_url()?>assets/bootstrap/js/jquery.min-3.4.1.js"></script>
<script src="<?=base_url()?>assets/bootstrap/js/popper.min-1.14.3.js"></script>
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script>


	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
</body>
</html>
