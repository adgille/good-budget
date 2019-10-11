<?php
    //get total category values
    $query = "SELECT
                    SUM(planned) AS planned_total,
                    SUM(spent) AS spent_total,
                    (SUM(planned) - SUM(spent)) AS remaining_total
              FROM categories;";
    $result = mysqli_query($dbc, $query)
            or die('Error getting totals. ' . mysqli_error($dbc));
    $row = mysqli_fetch_assoc($result);
    $remaining_total = $row["remaining_total"];
    $planned_total = $row["planned_total"];
    $spent_total = $row["spent_total"];
    
    if ($planned_total != 0) {
        $total_percent_remaining = max($remaining_total/$planned_total,0) * 100;
    } else {
        $total_percent_remaining = 0;
    }
    //apply styles based on category data
    if ($total_percent_remaining > 100) {
        $total_percent_remaining = 100;
        $total_budget_color = 'black';
    } else if ($total_percent_remaining > 50) {
        $total_budget_color = 'black';
    } else if ($planned>=$spent) {
        $total_budget_color = 'orange';
    } else {
        $total_budget_color = 'red';
    }
?>
    <!--display totals-->
    <div class="total-budget">
        Total Planned: <span class="planned"><?php echo $planned_total;?></span>
        Total Spent: <span class="spent"><?php echo $spent_total;?></span>
        Total Remaining: <span class="remaining" style="color:<?php echo $total_budget_color;?>"><?php echo $remaining_total;?></span>
        <div class="fullbudgetbar" style = "border-color:<?php echo $budget_color;?>">
            <div style="width:<?php echo $total_percent_remaining;?>%"class="remainingbudgetbar"></div>
        </div>
    </div>
