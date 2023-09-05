<?php

namespace Give\Framework\Models\Factories;

use Exception;
use Faker\Generator;
use Give\Framework\Database\DB;
use Give\Framework\Models\Contracts\ModelCrud;

/**
 * @template M
 */
abstract class ModelFactory
{
    /**
     * @var class-string<M>
     */
    protected $model;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @var int The number of models to create.
     */
    protected $count = 1;

    /**
     * @since 2.20.0
     *
     * @param  class-string<M>  $model
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->faker = $this->withFaker();
    }

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    abstract public function definition(): array;
=======
     *
     * @return array
     */
    abstract public function definition();
>>>>>>> fb785cbb (Initial commit)

    /**
     * @since 2.20.0
     *
     * @param  array  $attributes
     *
     * @return M|M[]
     */
    public function make(array $attributes = [])
    {
        $results = [];
        for ($i = 0; $i < $this->count; $i++) {
<<<<<<< HEAD
            $instance = $this->makeInstance($attributes);
=======
            /** @var ModelCrud $model */
            $model = $this->model;

            $instance = new $model(
                array_merge($this->definition(), $attributes)
            );

            $this->afterMaking($instance);
>>>>>>> fb785cbb (Initial commit)

            $results[] = $instance;
        }

        return $this->count === 1 ? $results[0] : $results;
    }

    /**
     * @since 2.20.0
     *
     * @param  array  $attributes
     *
     * @return M|M[]
     * @throws Exception
     */
    public function create(array $attributes = [])
    {
        $instances = $this->make($attributes);
        $instances = is_array($instances) ? $instances : [$instances];

        DB::transaction(function () use ($instances) {
            foreach ($instances as $instance) {
                $instance->save();
<<<<<<< HEAD
=======

                $this->afterCreating($instance);
>>>>>>> fb785cbb (Initial commit)
            }
        });

        return $this->count === 1 ? $instances[0] : $instances;
    }

    /**
<<<<<<< HEAD
     * Creates an instance of the model from the attributes and definition.
     *
     * @since 2.23.0
     *
     * @return M
     */
    protected function makeInstance(array $attributes)
    {
        return new $this->model(array_merge($this->definition(), $attributes));
    }

    /**
     * Get a new Faker instance.
     *
     * @since 2.20.0
     */
    protected function withFaker(): Generator
=======
     * Get a new Faker instance.
     *
     * @return Generator
     */
    protected function withFaker()
>>>>>>> fb785cbb (Initial commit)
    {
        return give()->make(Generator::class);
    }

    /**
     * Configure the factory.
     *
<<<<<<< HEAD
     * @since 2.20.0
     */
    public function configure(): self
=======
     * @return $this
     */
    public function configure()
>>>>>>> fb785cbb (Initial commit)
    {
        return $this;
    }

    /**
<<<<<<< HEAD
     * Sets the number of models to generate.
     *
     * @since 2.20.0
     */
    public function count(int $count): self
=======
     * @param int $count
     *
     * @return $this
     */
    public function count($count)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->count = $count;

        return $this;
    }
<<<<<<< HEAD
=======

    /**
     * @since 2.20.0
     *
     * @param  M  $model
     *
     * @return void
     */
    public function afterCreating($model)
    {
        //
    }

    /**
     * @since 2.20.0
     *
     * @param  M  $model
     *
     * @return void
     */
    public function afterMaking($model)
    {
        //
    }
>>>>>>> fb785cbb (Initial commit)
}
