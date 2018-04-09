@extends('layouts.welcome')


@section('content')



<div id="chart-div"></div>
<div class="container-fluid w3-white">
    <select name="change_agent_chart" class="w3-margin" id="agentName" onchange="changeChart()">
        <?php
        $agent = \DB::table('agents')->get();
        foreach ($agent as $agents) {
            echo "<option value='" . $agents->id . "'> $agents->name</option>";
        }
        ?>
    </select>
</div>
<div id="temps_div">

</div>      
<?php

use Khill\Lavacharts\Lavacharts;

//$lava = new Lavacharts; // See note below for Laravel

$reasons = Lava::DataTable();

$reasons->addStringColumn('Reasons')
        ->addNumberColumn('Percent');

foreach ($query as $reason) {
    $reasons->addRow([$reason->jira_reason, $reason->count]);
}

Lava::PieChart('IMDB', $reasons, [
    'title' => 'Team\'s overall this week',
    'is3D' => true,
    'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]
]);

echo Lava::render('PieChart', 'IMDB', 'chart-div');
?>


<?php
//$lava = new Lavacharts; // See note below for Laravel

$temperatures = Lava::DataTable();

$temperatures->addDateColumn('Date')
        ->addNumberColumn('Karim')
        ->addRow(['2018-1-30', 3])
        ->addRow(['2018-2-30', 3])
        ->addRow(['2018-3-30', 2])
        ->addRow(['2018-4-30', 5])
        ->addRow(['2018-5-30', 3])
        ->addRow(['2018-6-30', 2])
        ->addRow(['2018-7-30', 1])
        ->addRow(['2018-8-30', 1])
        ->addRow(['2018-9-30', 5])
        ->addRow(['2018-10-30', 7])
        ->addRow(['2018-11-30', 4])
        ->addRow(['2018-12-30', 1])
;

Lava::LineChart('Temps', $temperatures, [
    'title' => 'Coaching oppurtunity count per month'
]);

echo Lava::render('LineChart', 'Temps', 'temps_div')
?>







<!--<div class="contact1">
    <div class="container-contact1">
        <table class="table table-responsive table-bordered">
            <thead>
            <th>Agent</th>
            <th>Total</th>
            <th>Did not provide enough logs</th>
            <th>Not enough troubleshooting </th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>-->


@endsection 

<script>

    function changeChart() {

        window.location.href = ;
    }

</script>