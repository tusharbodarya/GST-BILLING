<?php include 'header.php'; ?>
<div class="creative-state-area">
    <div class="row">
        <div class="col-lg-7 col-12">
            <h4 class="creative-state-title">Dashboard</h4>
        </div>
        <div class="col-lg-5  col-12 text-lg-right">
            <div class="row short-states mb-lg-0 mb-4">
                <div class="col-6">
                    <span class="pr-2">unique visitors</span>
                    <span id="unique_visitors"></span>
                </div>
                <div class="col-6">
                    <span class="pr-2">total visitors</span>
                    <span id="total_visitors"></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="creative-state-icon bg-danger text-center pull-left">
                <i class="vl_clip-board"></i>
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4">9808</h3>
                <p class="mb-0">order received</p>
                <div class=" widget-action-link ">
                    <small class="text-danger weight700">5% <i class="fa fa-long-arrow-down"></i></small>
                </div>
                <div class="">
                    <canvas id="state_order_chart" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="creative-state-icon bg-warning text-center pull-left">
                <i class="vl_cart-full"></i>
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4">1231</h3>
                <p class="mb-0">total sales</p>
                <div class=" widget-action-link">
                    <small class="text-success weight700">5% <i class="fa fa-long-arrow-up"></i></small>
                </div>
                <div class="">
                    <canvas id="state_sale_chart" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="creative-state-icon bg-purple text-center pull-left">
                <i class="vl_dollar-on-hand"></i>
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4">23214</h3>
                <p class="mb-0">total profit</p>
                <div class=" widget-action-link">
                    <small class="text-success weight700">5% <i class="fa fa-long-arrow-up"></i></small>
                </div>
                <div class="">
                    <canvas id="state_profit_chart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>