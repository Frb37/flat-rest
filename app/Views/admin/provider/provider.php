<?php

// TO-DO: Rework this snippet to tune it in to the new website and its purpose

?>

<div class="row">
    <div class="col">
        <form action="<?= isset($provider) ? base_url("/admin/provider/update") : base_url("/admin/provider/create") ?>" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">
                        <?= isset($provider) ? "Edit " . $provider['name'] : "Create a provider" ?>
                    </h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="true">Profil</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">Commentaires</button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content border p-3">
                        <div class="tab-pane active" id="profil" role="tabpanel" aria-labelledby="profil-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" value="<?= isset($provider) ? $provider['name'] : ""; ?>" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?= isset($provider) ? $provider['address'] : "" ?>" <?= isset($provider) ? "readonly" : "" ?> >
                            </div>
                            <!-- Choose a city name.
                            Use a SELECT structure with a join between the city and provider tables to display
                            actual city names rather than IDs -->
                            <div class="mb-3">
                                <label for="password" class="form-label">City</label>
                                <input type="password" class="form-control" id="city" placeholder="city" value="" name="password">
                            </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <?php if (isset($provider)): ?>
                        <input type="hidden" name="id" value="<?= $provider['id']; ?>">
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary">
                        <?= isset($provider) ? "Sauvegarder" : "Enregistrer" ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        var baseUrl = "<?= base_url(); ?>";
        var dataTable = $('#tableComments').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "autoWidth": false,
            "language": {
                url: '<?= base_url("/js/datatable/datatable-2.1.4-fr-FR.json") ?>',
                "emptyTable": "Aucun commentaire trouvé pour cet utilisateur" // Message personnalisé
            },
            "ajax": {
                "url": "<?= base_url('/admin/comment/searchdatatable'); ?>",
                "type": "POST",
                "data": { 'filter': 'user', 'filter_value': '<?= isset($utilisateur)? $utilisateur['id']: ''; ?>' }
            },
            "columns": [
                {"data": "id"},
                {"data": "id_comment_parent"},
                {"data": "content"},
                {
                    data: 'item_name',
                    sortable: false,
                    render: function(data, type, row) {
                        return `<a class="link-underline link-underline-opacity-0" href="${baseUrl}admin/item/${row.id_item}">${row.item_name}</a>`;
                    }
                },
                {"data": "created_at"}
            ]
        });
    });
</script>