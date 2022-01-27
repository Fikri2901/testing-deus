   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
   	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
   <script>
   	$(document).ready(function () {
   		$('#myTable tfoot th').each(function () {
   			var title = $(this).text();
   			$(this).html('<input type="text" style="width:100%;" placeholder="Search ' + title +
   				'" />');
   		});
   		$('#myTable').DataTable({
   			dom: 'Bfrtip',
   			buttons: [
   				'pageLength', 'colvis', 'copy', 'csv', 'excel', 'pdf', 'print'
   			],
   			initComplete: function () {
   				// Apply the search
   				this.api().columns().every(function () {
   					var that = this;

   					$('input', this.footer()).on('keyup change clear', function () {
   						if (that.search() !== this.value) {
   							that
   								.search(this.value)
   								.draw();
   						}
   					});
   				});
   			}
   		});
   	});

   </script>

   <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
   </body>

   </html>
