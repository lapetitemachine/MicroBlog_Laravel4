<?php 

namespace MicroBlog\Images;


class ImageResizer 
{

    /**
     * Resizes an image to the specified dimensions
     */
    public function crop($imgPath, $width, $height = null)
    {
        if (null === $height) {
            $height = $width;
        }

        $imageType = $this->guessImageType($imgPath);

        $imageCreateFunction = 'imagecreatefrom' . $imageType;
        $source = $imageCreateFunction($imgPath);

        $destination = imagecreatetruecolor($width, $height);

        imagecopyresampled($destination, $source, 0, 0, 0, 0, $width, $height, imagesx($source), imagesy($source));

        $outputImageFunction = 'image' . $imageType;
        $outputImageFunction($destination, $imgPath);
    }





    private function guessImageType($imgPath)
    {
        $imgInfos = getimagesize($imgPath);
        $mimeType = $imgInfos['mime'];

        if (!in_array($mimeType, array( 'image/gif', 'image/png', 'image/jpeg', 'image/pjpeg' ))) {
            throw new \Exception('Image format not allowed (only jpeg, png and gif)');
        }

        $type =  array_pop((explode('/', $mimeType)));
        if ($type === 'pjpeg') {
            $type = 'jpeg';
        }

        return $type;
    }
}

