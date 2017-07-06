<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * \App\Models\InformationSchema
 *
 * @mixin \Eloquent
 */
	class InformationSchema extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vandriver
 *
 * @property int $driver_id
 * @property string|null $driver_join_id 司机加盟id
 * @property string|null $driver_apply_time 加盟系统司机申请时间
 * @property string|null $vehicle_plate
 * @property int|null $vehicle_plate_color 车牌颜色id:1-蓝牌,2-黄牌,3-绿牌,4-黄绿牌
 * @property string|null $driver_license
 * @property string|null $_vehicle_type
 * @property string|null $vehicle_subtype
 * @property string|null $vehicle_brand
 * @property string|null $brand_series 车系
 * @property string $txCreate
 * @property string $txModify
 * @property int|null $city_id
 * @property string $full_name 全名
 * @property string $name_xing 姓氏
 * @property string $name_ming 名
 * @property string $_qq_number QQ号码
 * @property string $_wechat_number 微信号
 * @property int $zone_id 城市、行政/功能区
 * @property string $recommended_from 推荐人
 * @property string $remark 备注
 * @property int $_is_joined_driver 是否是加盟司机 0 否 1 是
 * @property string $_joined_remark 抢单状态备注
 * @property int $_train_status 培训状态 :0-待培训; 1-已培训;2-报名培训中
 * @property string $_rain_remark 培训状态备注
 * @property string|null $_pay_bank
 * @property string|null $_pay_bank_holder
 * @property string|null $_pay_bank_no
 * @property string|null $_pay_alipay_no
 * @property string|null $_pay_preferred_method
 * @property string $home_address 地址,APP无入口填写和展示，但是后台有在录入和展示
 * @property string $_bank_no 银行账号
 * @property string $_bank_area 开户地区
 * @property string $_bank_branch 开户支行
 * @property int $_bank_editable 允许司机编辑银行卡信息
 * @property string $_archives_no 档案编号
 * @property string $emergency_contact 紧急联系人
 * @property string $_emergency_relationship 紧急联系人与司机的关系
 * @property string $emergency_tel 紧急联系人电话
 * @property string $_alternate_tel 备用手机号码
 * @property string $vehicle_operation 车辆运营性质，默认空，1：运营，2：非运营
 * @property int $_training (将废弃字段)报名培训
 * @property string $_txtraining 点击报名培训的时间
 * @property int $deposit 押金，以分为单位
 * @property int $is_sticker 是否有车贴: 0-没有 1-有 2-报名中
 * @property string $is_sticker_remark 车贴修改备注
 * @property int $sticker_status 车贴报名状态：0：待跟进，1：已安排车贴，2：关闭结束
 * @property string $vehicle_registration_date 车辆注册日期
 * @property string $sticker_time 车贴报名时间
 * @property int $order_count 完成订单数
 * @property int $vip vip等级; 0:非会员，1:低级，2中级，3:高级
 * @property int $_ban 是否拉黑，0：正常，1：定时拉黑,2永久拉黑
 * @property string $unban_at 自动解封时间
 * @property string $_ban_update_time 更新ban状态的时间
 * @property int $_verify 验证1:已验证,0:未查阅,2:拒绝，3:待认证
 * @property string $_verify_update_time 认证状态更新时间
 * @property float $rating 司机平均分
 * @property string $hash
 * @property string|null $name
 * @property string $phone_no
 * @property string|null $_tel2
 * @property string|null $referral
 * @property int $on_duty
 * @property string|null $device_identifier
 * @property string|null $device_type
 * @property string|null $version
 * @property string|null $revision
 * @property string|null $push
 * @property string|null $token
 * @property string|null $token_created
 * @property int $source 司机从哪些渠道认识货拉拉：1-网上搜索，2-亲友介绍，3-同行介绍，4-传单海报，5-QQ微信群，6-应用商店，7-客户介绍，8-货拉拉人员，9-车身广告，10-微信公众号
 * @property string|null $driver_code 推荐码
 * @property int $finance_level 打款等级（1：正常，2：加速）
 * @property int $physics_vehicle_id 细分车型id,关联d_vehicle_physics.id
 * @property string $std_tag 司机车型规格标签，用逗号间隔的中文字符串
 * @property string $push_cid 推送用的clientId
 * @property string $lala_cid 拉拉推cid
 * @property int $reject_rate 拒单率 (拒单率乘以100)
 * @property int $ontime_rate 准点率 (准点率乘以100)
 * @property int|null $protocol_revision 服务协议版本
 * @property int|null $account_status 司机状态 -1:待认证 1:正常，2：定时拉黑, 3 永久拉黑 4:停止推送 5： 预销户 6：已销户
 * @property string $deposit_pay_info 发起保证金支付未成功时的临时信息,支付时间戳|单号|状态,状态0:未支付1:前端支付成功,重新发起支付或成功后该字段清空
 * @property string $first_deposit_time 交入门保证金时间缀 0:没交 >0交时间缀 有可能入门需要交为0这时也算交过
 * @property string $verify_time 司机通过认证时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereAccountStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereAlternateTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereArchivesNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBanUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBankArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBankBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBankEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBankNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereBrandSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDepositPayInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDeviceIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDeviceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDriverApplyTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDriverCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDriverJoinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereDriverLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereEmergencyContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereEmergencyRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereEmergencyTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereFinanceLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereFirstDepositTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereHomeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereIsJoinedDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereIsSticker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereIsStickerRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereJoinedRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereLalaCid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereNameMing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereNameXing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereOnDuty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereOntimeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereOrderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePayAlipayNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePayBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePayBankHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePayBankNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePayPreferredMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePhoneNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePhysicsVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereProtocolRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePush($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver wherePushCid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereQqNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRainRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRecommendedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereReferral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRejectRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereRevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereStdTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereStickerStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereStickerTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTokenCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTrainStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTraining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTxCreate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTxModify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereTxtraining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereUnbanAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehicleBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehicleOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehiclePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehiclePlateColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehicleRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehicleSubtype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVehicleType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVerify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVerifyTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVerifyUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereVip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereWechatNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vandriver whereZoneId($value)
 * @mixin \Eloquent
 */
	class Vandriver extends \Eloquent {}
}

