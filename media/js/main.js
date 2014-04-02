            function getData(obj_form) {
                var hData = {};

                $('input, textarea, select, hidden').each(function() {
                    if (this.name && this.name != '') {
                        hData[this.name] = this.value;
                        console.log('hData[' + this.name + ']=' + hData[this.name]);
                    }

                });

                return hData;
            }




            $(document).ready(function() {

                $('form select[name=status]').change(function() {
                    
                    $("#error").slideUp('slow'); // убираем блок с ошибкой, если он был
                    $("#loading").slideDown('slow'); // показываем индикатор загрузки
                    
                   var select = $(this).val();
                   var id = $(this).attr('rel');
                    console.log(select+' '+ id);
                 $.ajax({// описываем наш запрос
                        type: "POST", // будем передавать данные через POST
                        dataType: "json", // указываем, что нам вернется JSON
                        url: "/ajax/changestatus", // запрос отправляем на контроллер Ajax метод addarticle
                        data: "status="+select+"&id="+id, // передаем данные из формы
                        success: function(response) {
                            
                             if (response.code == 'error') // если вернулся статус с ошибкой
                            {
                                $("#error").slideDown('slow'); // показываем блок с сообщением об ошибке
                            }
                            if (response.code == 'success') // если вернулся статус успешного добавления статьи в БД
                            {
                                $("#articles").load('/ajax/getarticles'); // обновляем список статей
                            }
                     
                            $("#loading").slideUp('slow'); // убираем индикатор загрузки
                           
                            
                        }
                    })

                });
         
                
                
                $("#sendAjax").click(function() { // при нажатии кнопки добавления новой статьи
                     console.log('send!');
                    var postData = getData('addarticle');
                    $("#sendAjax").attr('disabled', 'disabled'); // делаем кнопку недоступной, чтобы избежать повторных нажатий
                    $("#error").slideUp('slow'); // убираем блок с ошибкой, если он был
                    $("#loading").slideDown('slow'); // показываем индикатор загрузки
                    var name = $('#name').val(); // берем имя статьи из формы
                    var text = $('#text').val(); // берем текст из формы
                    $.ajax({// описываем наш запрос
                        type: "POST", // будем передавать данные через POST
                        dataType: "json", // указываем, что нам вернется JSON
                        url: "/ajax/addarticle", // запрос отправляем на контроллер Ajax метод addarticle
                        data: postData, // передаем данные из формы
                        success: function(response) { // когда получаем ответ
                            if (response.code == 'error') // если вернулся статус с ошибкой
                            {
                                $("#error").slideDown('slow'); // показываем блок с сообщением об ошибке
                            }
                            if (response.code == 'success') // если вернулся статус успешного добавления статьи в БД
                            {
                                $("#articles").load('/ajax/getarticles'); // обновляем список статей
                            }
                            $("#sendAjax").removeAttr('disabled'); // делаем кнопку снова доступной
                            $("#loading").slideUp('slow'); // убираем индикатор загрузки
                        }
                    });
                });
              });  
