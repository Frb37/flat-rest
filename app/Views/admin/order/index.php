<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>List of orders</h4>
        <a href="<?= base_url('/admin/order/new'); ?>"><i class="fa-solid fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="tableOrders" class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Delivered by</th>
                <th>Meal(s)</th>
                <th>Quantity</th>
                <th>Date delivered</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function () {
        var baseUrl = "<?= base_url(); ?>";
        var dataTable = $('#tableOrders').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "language": {
                url: baseUrl + 'js/datatable/datatable-2.1.4-fr-FR.json',
            },
            "ajax": {
                "url": baseUrl + "admin/provider/SearchProvider",
                "type": "POST"
            },
            "columns": [
                {"data": "id"},
                {
                    data : 'avatar_url',
                    sortable : false,
                    render : function(data) {
                        if (data) {
                            return `<img src="${baseUrl}${data}" alt="Avatar" style="max-width: 20px; height: auto;">`;
                        } else {
                            // Retourne une image par défaut si data est vide
                            return '<img src="' + baseUrl + 'assets/img/avatars/1.jpg" alt="Default Avatar" style="max-width: 20px; height: auto;">';
                        }
                    }
                },
                {"data": "name"},
                {"data": "address"},
                {"data": "city_id"},
                {
                    data : 'id',
                    sortable : false,
                    render : function(data) {
                        return `<a href="${baseUrl}admin/provider/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                    }
                },
                {
                    data : 'id',
                    sortable : false,
                    render : function(data, type, row) {
                        return (row.deleted_at === null ?
                            `<a title="Supprimer le fournisseur" href="${baseUrl}admin/provider/delete/${row.id}"><i class="fa-solid fa-xl fa-toggle-on text-success"></i></a>`
                    }
                }
            ]
        });
    });

</script>