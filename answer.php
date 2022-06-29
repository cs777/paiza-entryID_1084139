<?php
/*
=================================================================================================
n個の品物があり、i番目の品物のそれぞれ重さと価値が weight[i],value[i]となっている (i=0,1,...,n−1)。
これらの品物から重さの総和がWを超えないように選んだときの、価値の総和の最大値を求めよ。
※実装言語はお任せします。
※テストコードも実装してください。
※開発にかかった所要時間も提出してください。

[制約]
・1 < n <= 100
・weight[i],value[i]は整数
・1 <= weight[i],value[i] <= 1000
・1 <= W <= 10000
=================================================================================================
*/
// 総数 N
$N = trim(fgets(STDIN));
// 0 から n-1 番目の重さ Weight と価値 Value
for($i=0;$i<$N;++$i) {
    [$weight[$i], $value[$i]] = explode(" ",trim(fgets(STDIN)));
}
// 重さの総和の限界値 W
$W = trim(fgets(STDIN));

for($i=0;$i<$N;++$i) {
    if( empty($valueArr[$weight[$i]]) ) {
        $valueArr[$weight[$i]] = $value[$i];
    } else {
        if ( $valueArr[$weight[$i]] < $value[$i] ) {
            $valueArr[$weight[$i]] = $value[$i];
        }
    }
}

sort($weight);
for($j=0;$j<$N;++$j) {
    $i = $j;
    $weights = $values = 0;
    while( $weights<=$W ) {
        if($values !== 0) $arr[] = $values;
        $weights += $weight[$i];
        $values += $valueArr[$weight[$i]];
        $i++;
        if ( $i >= $N ) break;
    }
}

// 結果
echo max($arr).PHP_EOL;
