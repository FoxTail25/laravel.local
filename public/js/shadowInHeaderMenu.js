        /****************************/
        /* Добавление тени в header */
        /****************************/
        // Находим элементы шапки и зоны прокрутки в DOM
        const contentZone = document.getElementById('contentZone');
        const mainHeader = document.getElementById('mainHeader');

        // Слушаем событие скролла внутри контента
        contentZone.addEventListener('scroll', () => {
            // Если прокрутили хотя бы на 5 пикселей вниз
            if (contentZone.scrollTop > 5) {
                mainHeader.classList.add('shadow'); // Встроенный класс Bootstrap
            } else {
                mainHeader.classList.remove('shadow'); // Удаляем тень в самом верху
            }
        });
