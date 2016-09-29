<?php
include("includes/header.php");
$results = $get->get_single_result('page', 'id', '3');
$finance = $get->get_all_data('finance', 'id', 'ASC');
$slider = $get->get_all_data_active('slider', 'slider_id', 'desc', 'slider_active', 'yes');
?>
<section>
    <div id="compare_loans">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="finance_header">
                        <h2><?php echo $results['page_title']; ?></h2>
                        <?php echo $results['content']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="compare_slider">
                    <div class="left_img col-sm-4">
                        <img src="images/top_img.jpg">
                    </div>
                    <div class="right_slider col-sm-8">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators 
                            <ol class="carousel-indicators">
                                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#myCarousel" data-slide-to="1"></li>
                                  <li data-target="#myCarousel" data-slide-to="2"></li>
                                  <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>
                            -->
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                foreach ($slider as $result)
                                    {
                                    ?>

                                    <div class="item">
                                        <img src="<?php
                                        if (isset($result['slider_full_path']))
                                            {
                                            echo $result['slider_full_path'];
                                            }
                                        ?>" alt="">
                                    </div> <?php } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="compare_loan">
                        <h3>Compare Car Loans</h3>
                        <p>
                            Need a car loan? Buying a new car is exciting but researching possible finance deals on your own is not! Use compareit4me to find the best car finance deals in Qatar. We gather all the information you need enabling you to find the best offers. 
                        </p>
                        <p>
                            Compare car loans based on; interest rates, deposit requirements, arrangement fees, settlement fees and other applicable loan terms so you can compare the leading car finance products and secure the best deal for your needs. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loan-fillter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 filter_inner">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Looking for specifics</a></li>
                        <li><a data-toggle="tab" href="#menu1">Monthly Payment Calculator</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active clearfix">
                            <div class="specifics">
                                <form id="specifics_form" class="form-inline">
                                    <div class="form-group left_form col-sm-8">
                                        <label class="" for="amount">Looking for something specific?</label>
                                        <select>
                                            <option>Salary</option>
                                            <option>Less than QAR 4,999</option>
                                            <option>QAR 5,000 to QAR 7,999</option>
                                            <option>QAR 8,000 to QAR 11,999</option>
                                            <option>QAR 8,000 to QAR 11,999</option>
                                            <option>QAR 15,000 to QAR 19,999</option>
                                            <option>QAR 15,000 to QAR 19,999</option>
                                            <option>QAR 25,000 to QAR 29,999</option>
                                            <option>QAR 30,000 to QAR 39,999</option>
                                            <option>QAR 40,000 and above</option>
                                        </select>
                                        <select>
                                            <option>Features</option>
                                            <option>Dedicated Relationship Manager</option>
                                            <option>Finance for Used Cars</option>
                                            <option>Internet Banking</option>
                                            <option>Introductory Offers</option>
                                            <option>Islamic Finance</option>
                                            <option>Roadside Assistanc</option>
                                            <option>Salary Transfer</option>
                                            <option>Second Car Finance</option>
                                        </select>
                                        <h5 class="or pull-right">or</h5>
                                    </div>
                                    <div class="form-group right_form col-sm-4">
                                        <label class="" for="amount">Car Price (QAR)</label>
                                        <select>
                                            <option>Bank</option>
                                            <option>Bank</option>
                                            <option>Ahli Bank</option>
                                            <option>Al Khalij Commercial Bank</option>
                                            <option>Barwa Bank</option>
                                            <option>Commercial Bank of Qatar</option>
                                            <option>Doha Bank</option>
                                            <option>HSBC</option>
                                            <option>International Bank of Qatar</option>
                                            <option>Mashreq</option>
                                            <option>Masraf Al Rayan</option>
                                            <option>Qatar Islamic Bank</option>
                                            <option>Qatar National Bank</option>
                                        </select>
                                        <div class="filter_buttons text-center">
                                            <a href="#" class="btn btn-default filter_btn">Reset</a>
                                            <a href="#" class="btn btn-default filter_btn">Filter</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade clearfix">
                            <div class="monthly">
                                <div class="col-sm-9">
                                    <form id="monthly">
                                        <div class="top_feilds">
                                            <div class="form-group">
                                                <label class="" for="amount">Car Price (QAR)</label>
                                                <input type="text" placeholder="200,000" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="amount">Deposit Amount (QAR)</label>
                                                <input type="text" placeholder="40,000" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="amount">Terms (years) </label>
                                                <input type="text" placeholder="4" class="form-control">
                                            </div>
                                        </div>
                                        <div class="bottom_feilds">
                                            <div class="form-group">
                                                <input type="text" placeholder="Email Address" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <!--<a href="#" class="calculate form-control">calculate</a>-->
                                                <input type="button" value="calculate" class="form-control calculate">
                                            </div>
                                        </div>
                                        <p>*Calculations are based on flat rates </p>
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <div class="monthly_text">
                                        <P>
                                            We match your details with the most trusted banks in the Middle East to find the perfect product for your needs. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="product_list">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="product_list_inner table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="header">
                                        <div class="header_inner">
                                            Provider
                                        </div>
                                    </th>
                                    <th class="header">
                                        <div class="header_inner">
                                            Minimum Salary
                                        </div>
                                    </th>
                                    <th class="header">
                                        <div class="header_inner">
                                            Down Payment
                                        </div>
                                    </th>
                                    <th class="header">
                                        <div class="header_inner">
                                            Monthly Payment
                                        </div>
                                    </th>
                                    <th class="header">
                                        <div class="header_inner">
                                            Flat Rate
                                        </div>
                                    </th>
                                    <th class="header">
                                        <div class="header_inner">
                                            Reducing Rate
                                        </div>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($finance as $data)
                                    {
                                    ?>




                                    <tr class="load-itemes productRow" style="display:none" >
                                        <td><div class="title">
                                                <div class="main_logo text-left"><img src="<?php echo $data['full_path']; ?>" alt="">   </div>
                                            </div></td>
                                        <td>QR  <?php echo $data['minimum_salary']; ?></td>
                                        <td><?php echo $data['down_payment']; ?>%</td>
                                        <td>QR  <?php echo $data['monthly_payment']; ?></td>
                                        <td><?php echo $data['flat_rate']; ?>%</td>
                                        <td><?php echo $data['reducing_rate']; ?>%</td>
                                        <td>
                                            <div class="td_btn"> <a  class="product_btn" href="<?php echo $data['link']; ?>" target="_blank">apply now</a> 

                                                <a href="#" class="td_compare_btn">Compare</a></div></td>  
                                    </tr>
                                    <tr class="viewMoreDetailsRow viewmore" style="display: none" >
                                        <td colspan="100">
                                            <a href="#demo" class="more_detail" data-toggle="collapse">View More Details</a>
                                            <div class="drop_content">
                                                <div id="demo" class="collapse">
                                                    <div class="drop_main clearfix">
                                                        <div class="col-sm-6">
                                                            <div class="drop_left text-left">
                                                                <p>Imagine driving away in your dream car.</p>
                                                                <p>You’ll get immediate approval and rates starting from 2.49% flat</p>
                                                                <div class="benefits">
                                                                    <h4>Features & Benefits:</h4>
                                                                    <ul>
                                                                        <li>Vehicle Loans starting from 2.49% flat (4.62% p.a. variable) for Qataris and 2.69% flat (4.99% p.a. variable) for Expats​</li>
                                                                        <li>Nothing to pay for up to 3 months​</li>
                                                                        <li>Exclusive discounts on your first year insurance at only 2.25% of the total car value with QAR 500 deductible​</li>
                                                                        <li>Option to finance additional associated costs at 0.00% interest for up to 24 months on your Credit Card (Subject to eligibility)​</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="representative">
                                                                    <h4>Representative example:</h4>
                                                                    <p>
                                                                        If you borrow QAR 10,000 over 3 years at a Representative APR of 4.6% fixed and an annual interest rate of 4.6% you would pay:
                                                                    </p>
                                                                    <p>
                                                                        Payment per month – QAR 297.50 | Total charge for credit – QAR 710 | Total amount you repay – QAR 10,710
                                                                    </p>
                                                                    <p>
                                                                        Please note, the actual rate applied to your loan will depend on your circumstances.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="apply text-left">
                                                                <div class="apply_one">
                                                                    <h3>Apply Online Now</h3>
                                                                    <p>
                                                                        At present, you can't apply for this product via compareit4me.com. But don't worry, by filling in the form below we'll help you find other options that you can apply for!
                                                                    </p>
                                                                </div>
                                                                <form role="form">
                                                                    <div class="form-group">
                                                                        <input type="text" placeholder="Full Name*" class="form-control">
                                                                        <input type="mailid" placeholder="Email Address*" class="form-control">
                                                                        <input type="tel" placeholder="Telephone*" class="form-control">
                                                                        <input type="text" placeholder="Sallary*" class="form-control">
                                                                        <input type="text" placeholder="Nationlity" class="form-control">
                                                                    </div>
                                                                    <input type="checkbox" name="loan" value="loan">Keep me up-to-date with news and offers.
                                                                </form>
                                                                <div class="submit text-center">
                                                                    <div class="capcha form_sub">
                                                                        ghjhgjgfyt
                                                                    </div>
                                                                    <div class="form_submit form_sub">
                                                                        <a href="#" class="btn btn-default form_btn">Apply Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>   





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="more_list_item">
                <a href="javascript:void(0)" id="ViewMore">Load More</a>
            </div>
        </div>
    </div>


</section>


<?php include("includes/footer.php") ?>    

