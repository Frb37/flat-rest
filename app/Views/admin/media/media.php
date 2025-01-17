<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body"><h4>Media Manager</h4></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Filters</h5>
            </div>
            <div class="card-body">
                <label for="filter-type" class="form-label">Filter by type</label>
                <select id="filter-type" class="form-select">
                    <option selected value="none">No filter</option>
                    <option value="user">User pict</option>
                    <option value="item">Meal pict</option>
                    <option value="brand">Ingredient</option>
                    <option value="license">Provider logo</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h5>Medias</h5>
            </div>
            <div class="card-body">
                <div class="row medias">
                    <?php foreach($medias as $media): ?>
                        <div class="col-4 col-md-2 mb-4 d-flex align-items-center position-relative media" data-id="<?= $media['id']; ?>">
                            <div class="media-mask bg-black bg-opacity-75 d-none rounded">
                                <div class="d-flex flex-column justify-content-center h-100 text-center p-3">
                                    <div>
                                        <div href="" class="btn btn-danger mb-3 media-delete">
                                            <i class="fa fa-solid fa-trash"></i> Delete
                                        </div>
                                    </div>
                                    <div>
                                        <div href="" class="btn btn-secondary media-edit">
                                            <i class="fa fa-solid fa-pencil"></i> Edit
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="img-thumbnail" src="<?= base_url($media['file_path']) ?>" ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col text-center" id="chargerPlus" data-limit="12" data-offset="12">
                        <div class="btn btn-outline-primary" id="btnChargerPlus">Load More</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.medias').on('mouseenter mouseleave', '.media', function() {
            $(this).find('.media-mask').toggleClass('d-none');
        });
        $('.medias').on('click', '.media-delete', function() {
            let media = $(this).closest('.media');
            let id = media.data('id');
            let url = "<?= base_url('/admin/media/delete/');?>";
            url = url + id;

            Swal.fire({
                title: "Êtes-vous certain de vouloir supprimer cette image ?",
                text: "Cette opération est irréversible",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Bien sûr !",
                cancelButtonText: "En fait, non"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(data) {
                            if (data == "true") {
                                media.remove();
                                Swal.fire({
                                    title: "Operation successful!",
                                    text: "Your file was successfully deleted"
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: "Operation failure!",
                                    text: "Your file could not be deleted",
                                    icon: "error"
                                });
                            }
                        }
                    })
                }
            });
        })
        $('#filter-type').on('change', function(e) {
            let entity_type = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('/admin/media/ajaxentitytype'); ?>",
                data: {
                    entity_type : entity_type ,
                },
                success: function (data) {
                    const row = $('.medias'); // Sélectionne la div contenant les médias
                    row.empty(); // Vider le contenu
                    $('#chargerPlus').data('offset',12);
                    data = JSON.parse(data);
                    // Ajout dynamique des medias
                    data.forEach(function(media) {
                        const mediaElement = `
                <div class="col-4 col-md-2 mb-4 d-flex align-items-center position-relative media" data-id="${media.id}">
                    <div class="media-mask bg-black bg-opacity-75 d-none rounded">
                        <div class="d-flex flex-column justify-content-center h-100 text-center p-2">
                            <div class="btn btn-danger mb-3 media-delete">
                                <i class="fa fa-solid fa-trash"></i> Delete
                            </div>
                            <div class="btn btn-secondary media-edit">
                                <i class="fa fa-solid fa-pencil"></i> Edit
                            </div>
                        </div>
                    </div>
                    <img class="img-thumbnail" src="${media.file_path}" alt="media-image">
                </div>
            `;
                        row.append(mediaElement);
                    });
                }
            })
        });
        $('#btnChargerPlus').on('click', function(e) {
            let entity_type = $('#filter-type').val();
            let limit = $('#chargerPlus').data('limit');
            let offset = $('#chargerPlus').data('offset');
            $.ajax({
                type: "GET",
                url: "<?= base_url('/admin/media/ajaxloadmore'); ?>",
                data: {
                    entity_type: entity_type,
                    limit: limit,
                    offset: offset,
                },
                success: function (data) {
                    const row = $('.medias'); // Sélectionne la div contenant les médias
                    data = JSON.parse(data);
                    // Ajout dynamique des medias
                    data.forEach(function(media) {
                        const mediaElement = `
                <div class="col-4 col-md-2 mb-4 d-flex align-items-center position-relative media" data-id="${media.id}">
                    <div class="media-mask bg-black bg-opacity-75 d-none rounded">
                        <div class="d-flex flex-column justify-content-center h-100 text-center p-2">
                            <div class="btn btn-danger mb-3 media-delete">
                                <i class="fa fa-solid fa-trash"></i> Delete
                            </div>
                            <div class="btn btn-secondary media-edit">
                                <i class="fa fa-solid fa-pencil"></i> Edit
                            </div>
                        </div>
                    </div>
                    <img class="img-thumbnail" src="${media.file_path}" alt="media-image">
                </div>
            `;
                        row.append(mediaElement);
                    });
                    offset = parseInt(offset) + parseInt(limit);
                    $('#chargerPlus').data('offset', offset);
                    console.log(offset);
                }
            });
        });
    });
</script>