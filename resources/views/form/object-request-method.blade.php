<x-layout>
    <x-slot:title>
        Form в Laravel
    </x-slot:title>

    <h2>
        Form в Laravel
    </h2>
    <h3>
        Методы объекта Request в Laravel
    </h3>
    В данном уроке мы рассмотрим полезные методы объекта запроса Request.
    <h4>
        Тип запроса
    </h4>
    Метод method позволяет получить тип запроса:
    <pre>echo $request->method();</pre>
    // выведет post или get
    <h4>
        Проверка типа запроса
    </h4>
    Метод isMethod позволяет проверить тип запроса. К примеру, можно выполнить какой-то код только для метода POST:
    <pre>
	if ($request->isMethod('post')) {

	}</pre>
    Либо можно выполнить какой-то код только для метода GET:
    <pre>
	if ($request->isMethod('get')) {

	}</pre>
    <h4>
        URI
    </h4>
    Метод path позволяет получить URI (запрошенный путь без имени домена) запроса:
    <pre>echo $request->path();</pre>
    <h4>
        URL
    </h4>
    Метод url позволяет получить URL запроса без строки GET параметров:
    <pre>echo $request->url();</pre>
    А метод fullUrl позволяет получить URL запроса со строкой GET параметров:
    <pre>echo $request->fullUrl();</pre>
    <h4>
        Маска
    </h4>
    Метод is позволяет проверить соответствие пути запроса заданной маске. При использовании этого метода можно
    использовать символ * в качестве маски:
    <pre>
	if ($request->is('admin/*')) {

	}</pre>
    <h4>
        Практические задачи
    </h4>
    Сделайте так, чтобы у вас было действие, которое будет срабатывать по следующему адресу:
    /object-request-method-task/{id}. Перейдите по
    указанному адресу, но с GET параметром, например, так: /object-request-method-task/{id}?param=1. Решите все задачи
    ниже для данного
    адреса с GET параметром.
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/form/object-request-method-task/1">
        Для указанного адреса выведите результат метода path.
    </a>
    <br />
    <a href="/form/object-request-method-task/2">
        Для указанного адреса выведите результат метода url.
    </a>
    <br />
    <a href="/form/object-request-method-task/3">
        Для указанного адреса выведите результат метода fullUrl.
    </a>
    <br />
</x-layout>
