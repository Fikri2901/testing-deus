   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        var table = $('#myTable').dataTable();
        var tableTools = new $.fn.dataTable.TableTools( table, {
            "buttons": [
                "copy",
                "csv",
                "xls",
                "pdf",
                { "type": "print", "buttonText": "Print me!" }
            ]
        } );
      
        $( tableTools.fnContainer() ).insertAfter('div.info')
    } );
</script>
  </body>
</html>