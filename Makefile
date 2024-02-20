install:
	composer install

dump:
	composer dump-autoload

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcbf -- --standard=PSR12 src bin

rec-cast:
	asciinema rec demo.cast --append

upload-cast:
	asciinema upload demo.cast