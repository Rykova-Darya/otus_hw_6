<?php

namespace Services;

class Sort
{
    private array $arr = [];
    private int $lengthArr;

    private int $cmp = 0;
    private int $asg = 0;

    public function __construct()
    {
    }

    public function ShellSort()
    {
        for ($gap = (int) $this->lengthArr / 5; $gap > 0; $gap = (int) ($gap / 5)) {
            for ($j = $gap; $j < $this->lengthArr; $j++) {
                for ($i = $j; $i >= $gap && $this->More($this->arr[$i - $gap], $this->arr[$i]); $i -= $gap) {
                    $this->Swap($i - $gap, $i);
                }
            }
        }

    }
    public function InsertSort()
    {
        for ($j = 1; $j < $this->lengthArr; $j++) {
            for ($i = $j - 1; $i >= 0 && $this->More($this->arr[$i], $this->arr[$i+1]); $i--) {
                $this->Swap($i, $i+1);
            }
        }
    }

    public function InsertShiftSort()
    {
        $i = 0;
        for ($j = 1; $j < $this->lengthArr; $j++) {
            $t = $this->arr[$j]; $this->asg++;
            for ($i = $j - 1; $i >= 0 && $this->More($this->arr[$i], $this->arr[$i+1]); $i--) {
                $this->arr[$i+1] = $this->arr[$i]; $this->asg++;
            }
            $this->arr[$i+1] = $t; $this->asg++;
        }
    }

    public function bubbleSort()
    {
        for ($j = $this->lengthArr - 1; $j > 0; $j--) {
            for ($i = 0; $i < $j; $i++) {
                if ($this->More($this->arr[$i], $this->arr[$i+1])) {
                    $this->Swap($i, $i+1);
                }
            }
        }

    }

    public function setRandom(int $lengthArr)
    {
        $this->lengthArr = $lengthArr;

        mt_srand(12345);

        for ($j = 0; $j < $lengthArr; $j++) {
            $this->arr[$j] = mt_rand(0, $lengthArr * 100 -1);
        }

    }

    public function setSorted(int $lengthArr)
    {
        $this->lengthArr = $lengthArr;
        for ($j = 0; $j < $lengthArr; $j++) {
            $this->arr[$j] = $j+1;
        }
    }

    public function setReversed(int $lengthArr)
    {
        $this->lengthArr = $lengthArr;
        for ($j = 0; $j < $lengthArr; $j++) {
            $this->arr[$j] = $j-1;
        }
    }

    private function More(int $a, int $b): bool
    {
        $this->cmp++;
        return $a > $b;
    }
    private function Swap(int $x, int $y): void
    {
        $t = $this->arr[$x];
        $this->arr[$x] = $this->arr[$y];
        $this->arr[$y] = $t;
        $this->asg += 3;
    }

    public function toString()
    {
        return "Длинна массива: " . $this->lengthArr . "\tcmp: " . $this->cmp . "\tasg " . $this->asg;

    }
}