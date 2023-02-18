frontend_c:
	docker-compose exec frontend sh

backend_c:
	docker-compose exec backend bash

docker up:
	docker-compose up -d