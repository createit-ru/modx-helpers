<p><b>Хук для Formit, отправка смс через сервис <a href="https://sms.ru/">sms.ru</a></b></p>

<p><b>Шаг 1.</b> Регистрация в сервисе и получение API_ID</p>
<p><b>Шаг 2.</b> Необходимо создать системные настройки:</p>
<ul>
  <li>sms_ru_api_id</li>
  <li>manager_phone (формат 7..., только цифры)</li>
</ul>

<p><b>Шаг 3.</b> Применение:</p>
<pre><code>[[!Formit?
  &hooks=`email,hookSMSru`
  ...
]]</code></pre>
