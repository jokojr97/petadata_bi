<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<?php
if ($hg1 == 1) {
?>
<script type="text/javascript">

Highcharts.chart('grafik1', {
    chart: {
        type: 'bar'
    },
    credits: {
        enabled: false
    },   
    title: {
        text: '<?= $kategori_sekarang ?> Jawa Timur Tahun <?= $tahun_data ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Poverty Resource Center Initiative'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "<?= $bidang_sekarang ?>",
            colorByPoint: true,
            dataSorting: {
                enabled: true,
                sortKey: 'y'
            },
            data: [
              <?php                
                foreach ($kab->result() as $row) {
              ?>              
                {
                    name: "<?= $row->nama_kab ?>",
                    y: <?php                       
                      $nilai = $hasil[$row->kd_kab];
                      if($nilai < 100){
                        $nilai = number_format($nilai, 2);
                      }                      
                      echo $nilai;
                    ?>,
                    color: "#ff4a1a",
                },

              <?php
                }
              ?>
            ]
        }
    ],
});
</script>

<?php } else if ( $hg1 == 2){ ?>
    <?php    
        // echo $kab[0][2015]['nilai'];

    ?>
<script type="text/javascript">
    Highcharts.chart('grafik2', {

    title: {
        text: '<?= $kategori_sekarang ?> <?= $kabupat['nama'] ?>, <?= $tahun_awal ?>-<?= $tahun_akhir ?>'
    },

    subtitle: {
        text: 'Source: Poverty Resource Center Initiative'
    },

    credits: {
        enabled: false
    },   
    xAxis: {
        accessibility: {
            rangeDescription: 'Range: <?= $tahun_awal ?> to <?= $tahun_akhir ?>'
        }
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2015,
        }
    },

    series: [{
        name: '<?= $kategori_sekarang ?>',
        data: [<?php for ($i=$tahun_awal;$i<=$tahun_akhir;$i++) { echo $hasil[$i].", "; } ?> ]
    }],
    
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
<?php } ?>
<!-- l/p chart -->