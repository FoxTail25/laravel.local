<x-layout>
    <x-slot:title>
        lesson blade2
    </x-slot:title>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <p>
        Пусть в действии дана переменная, содержащая CSS класс. Передайте эту переменную в представление и для какого-нибудь тега значением атрибута class укажите нашу переменную.
    </p>
    <p class="{{$class ?? 'red'}}">
        Переменные передаваемые в шаблом можно использовать в атрибутах
    </p>

</x-layout>
