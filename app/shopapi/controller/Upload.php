<?php
/**
 * shop多商户商城
 */

namespace app\shopapi\controller;

use app\model\upload\Album;
use app\model\upload\Upload as UploadModel;

/**
 * 上传管理
 * @author Administrator
 *
 */
class Upload extends BaseApi
{

    /**
     * 头像上传
     */
    public function image()
    {
        $upload_model = new UploadModel($this->site_id);
        $param = array (
            "thumb_type" => "",
            "name" => "file"
        );
        $path = $this->site_id > 0 ? "common/images/" . date("Ymd") . '/' : "common/images/" . date("Ymd") . '/';
        $result = $upload_model->setPath($path)->image($param);
        return $this->response($result);
    }

    /**
     * 上传 存入相册
     */
    public function album()
    {
        $token = $this->checkToken();
        if ($token[ 'code' ] < 0) return $this->response($token);

        $album_id = isset($this->params[ 'album_id' ]) ? $this->params[ 'album_id' ] : 0;

        $upload_model = new UploadModel($this->site_id);

        $album_model = new Album();
        $album_info = $album_model->getAlbumInfo([
            [ 'site_id', '=', $this->site_id ],
            [ 'is_default', '=', 1 ]
        ], 'album_id');
        $album_info = $album_info[ 'data' ];
        if (empty($album_id)) {
            $album_id = $album_info[ 'album_id' ];
        }

        $param = array (
            "thumb_type" => [ "big", "mid", "small" ],
            "name" => "file",
            "album_id" => $album_id
        );
        $result = $upload_model->setPath("common/images/" . date("Ymd") . '/')->imageToAlbum($param);

        return $this->response($result);
    }

    /**
     * 视频上传
     * @return \multitype
     */
    public function video()
    {
        $upload_model = new UploadModel($this->site_id);
        $name = input("name", "");
        $param = array (
            "name" => "file"
        );
        $result = $upload_model->setPath("common/video/" . date("Ymd") . '/')->video($param);
        return $result;
    }

}