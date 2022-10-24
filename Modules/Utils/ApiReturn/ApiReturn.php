<?php

namespace Modules\Utils\ApiReturn;

use Exception;
use Illuminate\Support\Facades\Response;

########################################
#                Errors                # 
########################################
define('DefaultError', ApiReturn::ErrorMessage());

########################################
#               Success                # 
########################################
define('DefaultSuccess', ApiReturn::SuccessMessage());


class ApiReturn
{
	const DefaultError = DefaultError;
	const DefaultSuccess = DefaultSuccess;

	public static function ErrorException(Exception $exception, $code = 409, $status = false)
	{
		$error = $exception->getMessage();
		if (env('APP_DEBUG') === true)
			$error = $exception->getTraceAsString();

		return self::ErrorMessage($error, $code, $status);
	}

	public static function ErrorMessage($message = 'Ops, algo deu errado...', $code = 409, $status = false)
	{
		$data = [
			'status' => $status,
			'description' => $message
		];

		return self::KeyMessage($message, $code, $data, 'error', null, $status);
	}

	public static function SuccessMessage($message = 'Successo', $code = 200, $data = [], $redirect = null, $status = true)
	{
		return self::KeyMessage($message, $code, $data, 'data', $redirect, $status);
	}

	public static function KeyMessage($message = 'Successo', $code = 200, $data = [], $keyName = 'data', $redirect = null, $status = true)
	{
		$response = [];

		if ($code >= 200 && $code <= 300)
			$response = [
				'status' => $status,
				'description' => $message
			];

		if (!empty($data))
			$response[$keyName] = $data;

		if (!is_null($redirect)) {
			if (!is_array($redirect) && !is_string($redirect))
				throw new \Exception("Redirect must be type array or string", 1);

			if (is_array($redirect))
				$response['redirect'] = $redirect;

			if (is_string($redirect))
				$response['redirect'] = $redirect;
		}

		return  Response::json($response, $code);
	}

	public static function StreamBase64($base64, $filename, $download = false)
	{
		$base64 = explode(';', $base64);
		$split = explode('/', $base64[0]);

		$fileType = '.' . $split[1];

		if (str_contains($base64[1], 'base64,'))
			$base64 = str_replace('base64,', '', $base64[1]);

		$content = base64_decode($base64);

		if ($download)
			return ApiReturn::StreamDowload($content, $fileType, $filename);

		return ApiReturn::Stream($content, $fileType, $filename);
	}

	public static function StreamDowload($file, $filetype, $filename = 'file', $headers = [])
	{
		if (empty($headers))
			$headers = [
				'Content-Type' => 'application/octet-stream',
				'Content-Disposition' => 'attachment; filename=' . $filename . $filetype . ';',
			];

		return Response::streamDownload(function () use ($file) {
			echo $file;
		}, $filename . '' . $filetype, $headers);
	}

	public static function Stream($file, $filetype, $filename = 'file', $headers = [], $code = 200)
	{
		if (empty($headers))
			$headers = [
				'Content-Type' => 'application/octet-stream',
				'Content-Disposition' => 'attachment; filename=' . $filename . $filetype . ';',
			];

		return Response::stream(function () use ($file) {
			echo $file;
		}, $code, $headers);
	}
}
