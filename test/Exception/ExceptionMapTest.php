<?php

declare(strict_types=1);

namespace FlixTech\SchemaRegistryApi\Test\Exception;

use FlixTech\SchemaRegistryApi\Exception\ExceptionMap;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ExceptionMapTest extends TestCase
{
    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\InvalidAvroSchemaException
     */
    public function it_should_handle_InvalidAvroSchema_code()
    {
        (new ExceptionMap())(
            new RequestException(
            '422 Unprocessable Entity',
                new Request('GET', '/'),
                new Response(
                    422,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":42201,"message": "Invalid Avro schema"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\IncompatibleAvroSchemaException
     */
    public function it_should_handle_IncompatibleAvroSchema_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '409 Conflict',
                new Request('GET', '/'),
                new Response(
                    409,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":409,"message": "Incompatible Avro schema"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\BackendDataStoreException
     */
    public function it_should_handle_BackendDataStore_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '500 Internal Server Error',
                new Request('GET', '/'),
                new Response(
                    500,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":50001,"message": "Error in the backend datastore"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\InvalidCompatibilityLevelException
     */
    public function it_should_handle_InvalidCompatibilityLevel_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '422 Unprocessable Entity',
                new Request('GET', '/'),
                new Response(
                    422,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":42203,"message": "Invalid compatibility level"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\InvalidVersionException
     */
    public function it_should_handle_InvalidVersion_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '422 Unprocessable Entity',
                new Request('GET', '/'),
                new Response(
                    422,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":42202,"message": "Invalid version"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\MasterProxyException
     */
    public function it_should_handle_MasterProxy_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '500 Internal server Error',
                new Request('GET', '/'),
                new Response(
                    500,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":50003,"message": "Error while forwarding the request to the master"}'
                )
            )
        );
    }

    /**
     * @test
     *
     * @expectedException \FlixTech\SchemaRegistryApi\Exception\OperationTimedOutException
     */
    public function it_should_handle_OperationTimedOut_code()
    {
        (new ExceptionMap())(
            new RequestException(
                '500 Internal server Error',
                new Request('GET', '/'),
                new Response(
                    500,
                    ['Content-Type' => 'application/vnd.schemaregistry.v1+json'],
                    '{"error_code":50002,"message": "Operation timed out"}'
                )
            )
        );
    }
}
