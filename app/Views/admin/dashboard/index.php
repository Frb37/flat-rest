<div class="row row-cols-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Comptage des utilisateurs</h4>
            </div>
            <div class="card-body">
                <canvas id="userPieChart"></canvas>
                <?php
                $totalUsers = array_sum(array_column($infosUser, 'count')); ?>
                Nombre total d'utilisateurs : <?= $totalUsers ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Convertir le tableau PHP en un objet JavaScript
    var data = <?php echo json_encode($infosUser); ?>;

    // Extraire les labels (catégories/étiquettes) et les données (counts) pour les représenter graphiquement
    var labels = data.map(function(item) {
        return item.name;
    })

    var counts = data.map(function(item) {
        return item.count;
    })

    // Configuration du graphique en secteurs/circulaire/"camembert"
    var ctx = document.getElementById('userPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: counts,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
            }
        }
    });
</script>