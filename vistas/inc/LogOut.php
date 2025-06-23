<script>
    let btn_salir=document.querySelector(".btn-exit-system");
    btn_salir.addEventListener("click",function(e){
        e.preventDefault();
        Swal.fire({
			title: '¿Estás seguro de cerrar la sesión?',
			text: "Estás a punto de cerrar la sesión y salir del sistema.",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Salir!',
			cancelButtonText: 'No, cancelar'
		}).then((result) => {
			if (result.value) {
				let url='<?php echo SERVERURL;?>ajax/loginAjax.php';
                let token='<?php echo $LC->encryption( $_SESSION['token']); ?>';
                let usuario='<?php echo $LC->encryption($_SESSION['usuario']); ?>';
                let datos = new FormData();
                datos.append("token",token);
                datos.append("usuario",usuario);
                
                fetch(url,{
                    method: 'POST',
                    body: datos
                })
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                return alertas_ajax(respuesta);
            });
			}
		});
    });
</script>