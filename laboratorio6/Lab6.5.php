<?php
    class ClaseBase {
        public function test() {
            echo "ClaseBase::test() llamada\n";
        }
        public function masTests() {
            echo "ClaseBase::masTests() llamada\n";
        }
        }
        class ClaseHijo extends ClaseBase {
        public function masTests() {
            echo "ClaseHijo::masTests() llamada\n";
        }
    }
?>