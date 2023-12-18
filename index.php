<?php
// Спільний інтерфейс
interface Resource {
    public function request();
}

// Реальний об'єкт
class RealResource implements Resource {
    public function request() {
        echo "Processing request from the real resource.<br>";
    }
}

// Замісник
class ProxyResource implements Resource {
    private $realResource;

    public function request() {
        // Ліниве створення реального об'єкта
        if (!$this->realResource) {
            $this->realResource = new RealResource();
        }

        // Додаткова логіка перед викликом реального об'єкта
        echo "Proxy is checking the request.<br>";

        // Виклик реального об'єкта
        $this->realResource->request();

        // Додаткова логіка після виклику реального об'єкта
        echo "Proxy has finished processing the request.<br>";
    }
}

// Використання паттерна Замісник
$proxy = new ProxyResource();
$proxy->request();
