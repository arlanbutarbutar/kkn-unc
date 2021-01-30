<div class="container-fluid">
    <div class="row m-3 mt-5">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-body text-center justify-content-center">
                    <h5 class="mb-5 mt-3">Bukti KHS Akhir <?= $bukti_khs?></h5>
                    <?php 
                        $ekstensiGambarValid=['jpg','jpeg','png','pdf'];
                        $ekstensiImage=['jpg','jpeg','png'];
                        $ekstensiDokumen=['pdf'];
                        $ekstensiGambar=explode('.',$bukti_khs);
                        $ekstensiGambar=strtolower(end($ekstensiGambar));
                        if(in_array($ekstensiGambar,$ekstensiImage)){
                            echo "<img src='../assets/bukti-khs-akhir/".$bukti_khs."' alt='Bukti KHS'>";
                        }else if(in_array($ekstensiGambar,$ekstensiDokumen)){
                            echo "<embed src='../assets/bukti-khs-akhir/".$bukti_khs."' width='800px' height='2100px' />";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>