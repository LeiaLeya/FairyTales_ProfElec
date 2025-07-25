<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $characters = [
            [
                'name' => 'Cinderella',
                'species' => 'Human',
                'story' => 'A young girl rises from ashes to royalty with a glass slipper.',
                'power' => 'Hope and kindness',
                'origin' => 'France',
                'antagonist' => 'Stepmother',
                'theme' => 'Rags to riches',
                'animal_sidekick' => 'Mice',
                'image_path' => 'characters/cinderella.png',
            ],
            [
                'name' => 'Snow White',
                'species' => 'Human',
                'story' => 'A princess poisoned by a jealous queen is revived by love.',
                'power' => 'Innocence and purity',
                'origin' => 'Germany',
                'antagonist' => 'Evil Queen',
                'theme' => 'Good vs evil',
                'animal_sidekick' => 'Forest animals',
                'image_path' => 'characters/snow-white.png',
            ],
            [
                'name' => 'Little Red Riding Hood',
                'species' => 'Human',
                'story' => 'A girl outsmarts a wolf while visiting her grandmother.',
                'power' => 'Wit and courage',
                'origin' => 'Europe',
                'antagonist' => 'Big Bad Wolf',
                'theme' => 'Stranger danger',
                'animal_sidekick' => null,
                'image_path' => 'characters/red-riding-hood.png',
            ],
            [
                'name' => 'Rapunzel',
                'species' => 'Human',
                'story' => 'A long-haired girl escapes a tower to discover the world.',
                'power' => 'Healing hair',
                'origin' => 'Germany',
                'antagonist' => 'Mother Gothel',
                'theme' => 'Freedom and self-discovery',
                'animal_sidekick' => 'Pascal',
                'image_path' => 'characters/rapunzel.png',
            ],
            [
                'name' => 'Aladdin',
                'species' => 'Human',
                'story' => 'A street rat finds a magic lamp and wins a princess’s heart.',
                'power' => 'Wits and magic wishes',
                'origin' => 'Arabia',
                'antagonist' => 'Jafar',
                'theme' => 'Self-worth and transformation',
                'animal_sidekick' => 'Abu',
                'image_path' => 'characters/aladdin.png',
            ],
            [
                'name' => 'The Little Mermaid',
                'species' => 'Mermaid',
                'story' => 'A mermaid gives up her voice for love and legs.',
                'power' => 'Beautiful voice',
                'origin' => 'Denmark',
                'antagonist' => 'Ursula',
                'theme' => 'Sacrifice and identity',
                'animal_sidekick' => 'Flounder',
                'image_path' => 'characters/little-mermaid.png',
            ],
            [
                'name' => 'Beauty (Belle)',
                'species' => 'Human',
                'story' => 'A girl sees beyond appearances and breaks a curse.',
                'power' => 'Kindness and intelligence',
                'origin' => 'France',
                'antagonist' => 'Gaston',
                'theme' => 'Inner beauty',
                'animal_sidekick' => 'Philippe',
                'image_path' => 'characters/belle.png',
            ],
            [
                'name' => 'Pinocchio',
                'species' => 'Wooden puppet',
                'story' => 'A puppet longs to be a real boy and learns morality.',
                'power' => 'Nose grows when lying',
                'origin' => 'Italy',
                'antagonist' => 'Temptation',
                'theme' => 'Honesty and growth',
                'animal_sidekick' => 'Jiminy Cricket',
                'image_path' => 'characters/pinocchio.png',
            ],
            [
                'name' => 'Jack',
                'species' => 'Human',
                'story' => 'Trades a cow for beans, climbs a giant beanstalk.',
                'power' => 'Bravery and luck',
                'origin' => 'England',
                'antagonist' => 'Giant',
                'theme' => 'Risk and reward',
                'animal_sidekick' => null,
                'image_path' => 'characters/jack.png',
            ],
            [
                'name' => 'Sleeping Beauty',
                'species' => 'Human',
                'story' => 'Cursed to sleep until kissed by true love.',
                'power' => 'Beauty and grace',
                'origin' => 'Europe',
                'antagonist' => 'Maleficent',
                'theme' => 'Fate and love',
                'animal_sidekick' => 'Forest animals',
                'image_path' => 'characters/sleeping-beauty.png',
            ],
            [
                'name' => 'Mulan',
                'species' => 'Human',
                'story' => 'A girl disguises as a soldier to protect her father.',
                'power' => 'Combat skill and courage',
                'origin' => 'China',
                'antagonist' => 'Shan Yu',
                'theme' => 'Honor and bravery',
                'animal_sidekick' => 'Mushu',
                'image_path' => 'characters/mulan.png',
            ],
            [
                'name' => 'Peter Pan',
                'species' => 'Human',
                'story' => 'A boy who never grows up leads adventures in Neverland.',
                'power' => 'Flying and eternal youth',
                'origin' => 'England',
                'antagonist' => 'Captain Hook',
                'theme' => 'Youth and imagination',
                'animal_sidekick' => 'Tinker Bell',
                'image_path' => 'characters/peter-pan.png',
            ],
            [
                'name' => 'Tiana',
                'species' => 'Human',
                'story' => 'Turns into a frog and learns love and dreams go together.',
                'power' => 'Determination',
                'origin' => 'New Orleans',
                'antagonist' => 'Dr. Facilier',
                'theme' => 'Hard work and love',
                'animal_sidekick' => 'Ray the firefly',
                'image_path' => 'characters/tiana.png',
            ],
            [
                'name' => 'Puss in Boots',
                'species' => 'Cat',
                'story' => 'A clever cat helps his master rise in rank.',
                'power' => 'Manipulation and fencing',
                'origin' => 'France',
                'antagonist' => 'Ogre',
                'theme' => 'Loyalty and wit',
                'animal_sidekick' => null,
                'image_path' => 'characters/puss-in-boots.png',
            ],
            [
                'name' => 'Thumbelina',
                'species' => 'Tiny human',
                'story' => 'A thumb-sized girl escapes forced marriages and finds love.',
                'power' => 'Empathy',
                'origin' => 'Denmark',
                'antagonist' => 'Toads and beetles',
                'theme' => 'Belonging',
                'animal_sidekick' => 'Swallow',
                'image_path' => 'characters/thumbelina.png',
            ],
            [
                'name' => 'Hercules',
                'species' => 'Demigod',
                'story' => 'A son of Zeus who proves himself a true hero by strength and heart.',
                'power' => 'Superhuman strength',
                'origin' => 'Greece',
                'antagonist' => 'Hades',
                'theme' => 'Heroism and sacrifice',
                'animal_sidekick' => 'Pegasus',
                'image_path' => 'characters/hercules.png',
            ],
            [
                'name' => 'Alice',
                'species' => 'Human',
                'story' => 'A curious girl falls down a rabbit hole into a whimsical world.',
                'power' => 'Imagination and bravery',
                'origin' => 'England',
                'antagonist' => 'Queen of Hearts',
                'theme' => 'Curiosity and identity',
                'animal_sidekick' => 'White Rabbit',
                'image_path' => 'characters/alice.png',
            ],
            [
                'name' => 'Elsa',
                'species' => 'Human',
                'story' => 'A queen with ice powers learns to embrace herself.',
                'power' => 'Ice and snow manipulation',
                'origin' => 'Arendelle',
                'antagonist' => 'Fear and isolation',
                'theme' => 'Self-acceptance',
                'animal_sidekick' => 'Olaf',
                'image_path' => 'characters/elsa.png',
            ],
            [
                'name' => 'Moana',
                'species' => 'Human',
                'story' => 'A young navigator sets sail to save her island.',
                'power' => 'Ocean affinity and leadership',
                'origin' => 'Polynesia',
                'antagonist' => 'Te Kā',
                'theme' => 'Destiny and courage',
                'animal_sidekick' => 'Hei Hei',
                'image_path' => 'characters/moana.png',
            ],
            [
                'name' => 'Merida',
                'species' => 'Human',
                'story' => 'A Scottish princess fights fate to control her own destiny.',
                'power' => 'Master archer and rider',
                'origin' => 'Scotland',
                'antagonist' => 'Tradition',
                'theme' => 'Independence and family',
                'animal_sidekick' => 'Bear',
                'image_path' => 'characters/merida.png',
            ],
        ];

        foreach ($characters as $data) {
            Character::create($data);
        }
    }
}
