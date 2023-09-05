<?php

namespace Give\Framework\PaymentGateways\DataTransferObjects;

/**
 * Class GatewayRouteData
<<<<<<< HEAD
 * @since      2.18.0
 * @since 2.23.1 Make class final to avoid unsafe usage of `new static()`.
 */
final class GatewayRouteData
=======
 * @since 2.18.0
 */
class GatewayRouteData
>>>>>>> fb785cbb (Initial commit)
{
    /**
     * @var string
     */
    public $gatewayId;
    /**
     * @var string
     */
    public $gatewayMethod;
    /**
     * @var array
     */
    public $queryParams;
    /**
     * @var string|null
     */
    public $routeSignature;
    /**
     * @var string|null
     */
    public $routeSignatureId;
    /**
     * @var string|null
     */
    public $routeSignatureExpiration;

    /**
     * Convert data from request into DTO
     *
     * @since 2.19.5 add routeSignatureExpiration
     * @since 2.19.4 add give-route-signature-id
     * @since 2.18.0
     *
     * @return self
     */
    public static function fromRequest(array $request)
    {
        $self = new static();

        $self->gatewayId = $request['give-gateway-id'];
        $self->gatewayMethod = $request['give-gateway-method'];
        $self->routeSignature = isset($request['give-route-signature']) ? $request['give-route-signature'] : null;
        $self->routeSignatureId = isset($request['give-route-signature-id']) ? $request['give-route-signature-id'] : null;
        $self->routeSignatureExpiration = isset($request['give-route-signature-expiration']) ? $request['give-route-signature-expiration'] : null;

        $self->queryParams = array_filter($request, static function ($param) {
<<<<<<< HEAD
            return ! in_array(
=======
            return !in_array(
>>>>>>> fb785cbb (Initial commit)
                $param,
                [
                    'give-listener',
                    'give-gateway-id',
                    'give-gateway-method',
                    'give-route-signature',
                    'give-route-signature-id',
<<<<<<< HEAD
                    'give-route-signature-expiration',
=======
                    'give-route-signature-expiration'
>>>>>>> fb785cbb (Initial commit)
                ]
            );
        }, ARRAY_FILTER_USE_KEY);

        return $self;
    }
}
