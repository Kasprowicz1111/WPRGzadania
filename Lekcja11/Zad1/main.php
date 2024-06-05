<?php

class NewCar {
    public $model;
    public $price_in_euro;
    public $current_exchange_rate;

    public function __construct($model, $price_in_euro, $current_exchange_rate) {
        $this->model = $model;
        $this->price_in_euro = $price_in_euro;
        $this->current_exchange_rate = $current_exchange_rate;
    }

    public function getModel() {
        return $this->model;
    }

    public function getPriceInEuro() {
        return $this->price_in_euro;
    }

    public function getCurrentExchangeRate() {
        return $this->current_exchange_rate;
    }

    public function CalculatePrice() {
        return $this->price_in_euro * $this->current_exchange_rate;
    }
}

class CarsWithExtras extends NewCar {
    public $alarm;
    public $radio;
    public $air_conditioning;

    public function __construct($model, $price_in_euro, $current_exchange_rate, $alarm, $radio, $air_conditioning) {
        parent::__construct($model, $price_in_euro, $current_exchange_rate);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->air_conditioning = $air_conditioning;

    }

    public function getAlarm() {
        return $this->alarm;
    }

    public function getRadio() {
        return $this->radio;
    }

    public function getAirConditioning() {
        return $this->air_conditioning;
    }

    public function CalculatePrice() {
        return ($this->price_in_euro + $this->alarm + $this->radio + $this->air_conditioning) * $this->current_exchange_rate;
    }
}

class Insurance extends CarsWithExtras {
    public $insurance_value; //percentage of insurance value
    public $age; //number of years of owning the car

    public function __construct($model, $price_in_euro, $current_exchange_rate, $alarm, $radio, $air_conditioning, $insurance_value, $age) {
        parent::__construct($model, $price_in_euro, $current_exchange_rate, $alarm, $radio, $air_conditioning);
        $this->insurance_value = $insurance_value;
        $this->age = $age;
    }

    public function getInsuranceValue() {
        return $this->insurance_value;
    }

    public function getAge() {
        return $this->age;
    }

    public function CalculatePrice() {
        $basePricePLN = parent::CalculatePrice();
        return ($this->insurance_value * ($basePricePLN * ((100-$this->age)/100)));
    }
}

$car = new NewCar("BMW M5 F90 Competition", 127000, 4.28);
echo "Model: " . $car->getModel() . "\n";
echo "Price in euro: " . $car->getPriceInEuro() . "\n";
echo "Current exchange rate Euro/PLN: " . $car->getCurrentExchangeRate() . "\n";
echo "Price in PLN: " . $car->CalculatePrice() . "\n" . "\n";

$car2 = new CarsWithExtras("BMW M5 F90 Competition", 127000, 4.28, 1000, 700, 800);
echo "Model: " . $car2->getModel() . "\n";
echo "Price in euro: " . $car2->getPriceInEuro() . "\n";
echo "Current exchange rate: " . $car2->getCurrentExchangeRate() . "\n";
echo "Alarm: " . $car2->getAlarm() . "\n";
echo "Radio: " . $car2->getRadio() . "\n";
echo "Air conditioning: " . $car2->getAirConditioning() . "\n";
echo "Price in PLN: " . $car2->CalculatePrice() . "\n". "\n";

$car3 = new Insurance("BMW M5 F90 Competition", 127000, 4.28, 1000, 700, 800, 0.07, 5); // 7% = 0.07
echo "Model: " . $car3->getModel() . "\n";
echo "Price in euro: " . $car3->getPriceInEuro() . "\n";
echo "Current exchange rate: " . $car3->getCurrentExchangeRate() . "\n";
echo "Alarm: " . $car3->getAlarm() . "\n";
echo "Radio: " . $car3->getRadio() . "\n";
echo "Air conditioning: " . $car3->getAirConditioning() . "\n";
echo "Percentage of insurance value: " . $car3->getInsuranceValue() . "\n";
echo "Number of years of owning the car: " . $car3->getAge() . "\n";
echo "Price in PLN: " . $car3->CalculatePrice() . "\n";