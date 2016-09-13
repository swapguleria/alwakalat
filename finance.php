<?php
include("includes/header.php");
$results = $get->get_single_result('page', 'id', '3');
$finance = $get->get_all_data('finance', 'id', 'ASC');
?>

<div class="comparison">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 finance">
                <h1><?php echo $results['page_title']; ?></h1>
                <?php echo $results['content']; ?>

            </div>
        </div>

        <table id="example-datatable" class="finanace-table">
            <thead>
                <tr>
                    <th class="pro">Provider</th>
                    <th class="min">Minimum Salary</th>
                    <th class="down">Down Payment</th>
                    <th class="pay">Monthly Payment</th>
                    <th class="flat">Flat Rate</th>
                    <th class="rate">Reducing Rate</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($finance as $data)
                    {
                    ?>

                    <tr class="load-itemes" style="display:none" >
                        <td><img src="<?php echo $data['full_path']; ?>" alt=""></td>
                        <td>QR  <?php echo $data['minimum_salary']; ?></td>
                        <td><?php echo $data['down_payment']; ?>%</td>
                        <td>QR  <?php echo $data['monthly_payment']; ?></td>
                        <td><?php echo $data['flat_rate']; ?>%</td>
                        <td><?php echo $data['reducing_rate']; ?>%</td>
                        <td>
                            <div class="filter-img2"> <a href="<?php echo $data['link']; ?>" target="_blank">apply now</a> </div></td>  
                    </tr>
                    <?php
                    }
                ?>

            </tbody>
        </table>
        <div class="col-md-12">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="more_list_item">
                    <a href="javascript:void(0)" id="ViewMore">Load More</a>
                </div>
            </div>
        </div>






    </div>
</div>
<?php include("includes/footer.php") ?>    

