up:
	./vendor/bin/sail up -d

down: 
	./vendor/bin/sail stop

bash:
	docker exec -it example-app-laravel.test-1 bash

db:
	docker exec -it example-app-mysql-1 bash

rebuild:
	./vendor/bin/sail build