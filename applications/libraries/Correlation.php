<?php 
namespace Inc;
class Correlation {
	static function Correl($arr1, $arr2)
	{        
	    $correlation = 0;
	    
	    $k = self::SumProductMeanDeviation($arr1, $arr2);
	    $ssmd1 = self::SumSquareMeanDeviation($arr1);
	    $ssmd2 = self::SumSquareMeanDeviation($arr2);
	    
	    $product = $ssmd1 * $ssmd2;
	    
	    $res = sqrt($product);
	    
	    $correlation = $k / $res;
	    
	    return $correlation;
	}

	static function SumProductMeanDeviation($arr1, $arr2)
	{
	    $sum = 0;
	    
	    $num = count($arr1);
	    
	    for($i=0; $i<$num; $i++)
	    {
	        $sum = $sum + self::ProductMeanDeviation($arr1, $arr2, $i);
	    }
	    
	    return $sum;
	}

	static function ProductMeanDeviation($arr1, $arr2, $item)
	{
	    return (self::MeanDeviation($arr1, $item) * self::MeanDeviation($arr2, $item));
	}

	static function SumSquareMeanDeviation($arr)
	{
	    $sum = 0;
	    
	    $num = count($arr);
	    
	    for($i=0; $i<$num; $i++)
	    {
	        $sum = $sum + self::SquareMeanDeviation($arr, $i);
	    }
	    
	    return $sum;
	}

	static function SquareMeanDeviation($arr, $item)
	{
	    return self::MeanDeviation($arr, $item) * self::MeanDeviation($arr, $item);
	}

	static function SumMeanDeviation($arr)
	{
	    $sum = 0;
	    
	    $num = count($arr);
	    
	    for($i=0; $i<$num; $i++)
	    {
	        $sum = $sum + self::MeanDeviation($arr, $i);
	    }
	    
	    return $sum;
	}

	static function MeanDeviation($arr, $item)
	{
	    $average = self::Average($arr);
	    
	    return $arr[$item] - $average;
	}    

	static function Average($arr)
	{
	    $sum = self::Sum($arr);
	    $num = count($arr);
	    
	    return $sum/$num;
	}

	static function Sum($arr)
	{
	    return array_sum($arr);
	}

	static function format3number($number) {
		return number_format($number, 3, '.', ',');
	}
	static function format2number($number) {
		return number_format($number, 2, '.', ',');
	}
}
?>