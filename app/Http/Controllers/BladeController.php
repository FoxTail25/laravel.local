<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function one1()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/variables-tags/

        Пусть в действии контроллера даны переменные $name, $age и $salary. Передайте значения этих переменных в представление и выведите содержимое каждой из этих переменных в отдельном абзаце.
         */
        $name = 'John';
        $age = '30';
        $salary = '2000';
        return view('blade.1', ['name' => $name, 'age' => $age, 'salary' => $salary]);
    }
    public function two1()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/variables-attributes/
        Пусть в действии дана переменная, содержащая CSS класс. Передайте эту переменную в представление и для какого-нибудь тега значением атрибута class укажите нашу переменную.
        */
        return view('blade.21', ['class' => 'red']);
    }
    public function two2()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/variables-attributes/
        Пусть в представлении даны 3 инпута. Передайте из действия в представление 3 переменные, значения которых запишите в атрибуты value наших инпутов.
        */
        $var1 = 'первый инпут';
        $var2 = 'второй инпут';
        $var3 = 'третий инпут';
        return view('blade.22', ['one' => $var1, 'two' => $var2, 'three' => $var3]);
    }
    public function two3()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/variables-attributes/
        Пусть в представлении дан абзац. Передайте из действия в представление переменную, содержащую CSS код, задающий красный цвет текста. С помощью атрибута style покрасьте наш абзац в красный цвет.
        */
        $color = 'red';
        return view('blade.23', ['color' => $color]);
    }
    public function two4()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/variables-attributes/
        Пусть в действии дана переменная $text, содержащая текст ссылки, и переменная $href, содержащая адрес ссылки. Передайте эти переменные в представление и сформируйте с их помощью HTML ссылку.
        */
        $url = 'https://code.mu';
        return view('blade.24', ['href' => $url]);
    }
    public function three1()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/arbitrary-code/
        Выведите в представлении текущую дату в формате день.месяц.год.
        */

        return view('blade.31');
    }
    public function four1()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/arrays/
        Пусть из действия в представление передаются данные работника в виде массива. Пусть в массиве будет ключ name, ключ age и ключ salary. Выведите каждый элемент массива в отдельном абзаце.
        */

        return view('blade.41', ['employee' => ['name' => 'John', 'age' => 22, 'salary' => '3000']]);
    }
    public function four2()
    {
        /*
        https://code.mu/ru/php/framework/laravel/book/prime/blade/arrays/
        Передайте в представление какой-нибудь массив. Выведите на экран количество элементов в этом массиве.
        */

        return view('blade.42', ['arr' => [1, 2, 3, 4, 5]]);
    }
    public function variablesChecking($id)
    {
        $task = [
            '1' => [
                'text' => 'Пусть из действия в представление передается переменная $city. Выведите в представлении названия города из этой переменной. Если же город не передан - пусть по умолчанию выведется город "Москва".',
                'data' => ['city' => 'Minsk']
            ],
            '2' => [
                'text' => 'Пусть из действия в представление передается массив $location с ключами country, city. Выведите каждый элемент это массива в отдельном абзаце. Сделайте так, чтобы, если не задана страна, то по умолчанию вывелась "Россия", а если не задан город, то по умолчанию вывелась "Москва".',
                'data' => ['location' => ['country' => null, 'city' => 'Kazan']]
            ],
            '3' => [
                'text' => 'Пусть из действия в представление передаются переменные $year, $month и $day. Сделайте так, чтобы, если какая-либо из этих переменных не задана, то вместо нее выведется текущее значение (текущий год, месяц или день).',
                'data' => ['day' => '01', 'month' => '05', 'year' => '2025']
            ]
        ];
        if (array_key_exists($id, $task)) {
            return view('blade.variables-checking' . $id, ['text' => $task[$id]['text'], 'data' => $task[$id]['data']]);
        }
    }
}
